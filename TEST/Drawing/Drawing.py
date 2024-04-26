import numpy as np
import matplotlib.pyplot as plt
from tensorflow.keras.datasets import mnist
from tensorflow.keras.models import Sequential, Model
from tensorflow.keras.layers import Dense, LeakyReLU, BatchNormalization, Reshape, Flatten
from tensorflow.keras.optimizers import Adam

# Generator 모델 생성
def build_generator(latent_dim):
    model = Sequential()
    model.add(Dense(128, input_dim=latent_dim))
    model.add(LeakyReLU(alpha=0.01))
    model.add(BatchNormalization())
    model.add(Dense(784, activation='tanh'))
    model.add(Reshape((28, 28)))
    return model

# Discriminator 모델 생성
def build_discriminator(img_shape):
    model = Sequential()
    model.add(Flatten(input_shape=img_shape))
    model.add(Dense(128))
    model.add(LeakyReLU(alpha=0.01))
    model.add(Dense(1, activation='sigmoid'))
    return model

# GAN 모델 생성
def build_gan(generator, discriminator):
    discriminator.trainable = False
    model = Sequential()
    model.add(generator)
    model.add(discriminator)
    return model

# 데이터 로딩 및 전처리
def load_data():
    (X_train, _), (_, _) = mnist.load_data()
    X_train = X_train / 127.5 - 1.0
    X_train = np.expand_dims(X_train, axis=3)
    return X_train

# GAN 모델 학습
def train_gan(generator, discriminator, gan, X_train, latent_dim, epochs=10000, batch_size=32, sample_interval=1000):
    for epoch in range(epochs):
        # 진짜 이미지 샘플링
        idx = np.random.randint(0, X_train.shape[0], batch_size)
        real_images = X_train[idx]

        # 가짜 이미지 생성
        noise = np.random.normal(0, 1, (batch_size, latent_dim))
        fake_images = generator.predict(noise)

        # 진짜와 가짜 이미지에 대한 레이블 생성
        real_labels = np.ones((batch_size, 1))
        fake_labels = np.zeros((batch_size, 1))

        # Discriminator 훈련
        d_loss_real = discriminator.train_on_batch(real_images, real_labels)
        d_loss_fake = discriminator.train_on_batch(fake_images, fake_labels)
        d_loss = 0.5 * np.add(d_loss_real, d_loss_fake)

        # Generator 훈련
        noise = np.random.normal(0, 1, (batch_size, latent_dim))
        g_loss = gan.train_on_batch(noise, real_labels)

        # 일정 간격으로 진행 상황 출력
        if epoch % sample_interval == 0:
            print(f"Epoch {epoch}, D Loss: {d_loss}, G Loss: {g_loss}")
            sample_images(generator, epoch)

# 생성된 이미지 시각화
def sample_images(generator, epoch, rows=5, cols=5):
    noise = np.random.normal(0, 1, (rows * cols, latent_dim))
    gen_images = generator.predict(noise)

    fig, axs = plt.subplots(rows, cols)
    idx = 0
    for i in range(rows):
        for j in range(cols):
            axs[i,j].imshow(gen_images[idx], cmap='gray')
            axs[i,j].axis('off')
            idx += 1
    fig.savefig(f"gan_images_epoch_{epoch}.png")
    plt.close()

# 하이퍼파라미터 설정
latent_dim = 100
img_shape = (28, 28, 1)

# 모델 생성 및 컴파일
generator = build_generator(latent_dim)
discriminator = build_discriminator(img_shape)
gan = build_gan(generator, discriminator)
discriminator.compile(loss='binary_crossentropy', optimizer=Adam(), metrics=['accuracy'])
gan.compile(loss='binary_crossentropy', optimizer=Adam())

# 데이터 로딩
X_train = load_data()

# GAN 모델 학습
train_gan(generator, discriminator, gan, X_train, latent_dim)
