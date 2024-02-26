import requests
import time
from bs4 import BeautifulSoup

# 웹사이트 URL
url = 'https://web.joongna.com/search/%EA%B5%BF%EC%A6%88?page='
set_url = ''
# 다운 위치
path = 'D:\\kkh\\Market\\goodsMarket\\public\\images\\samples\\'

# 이미지 URL 리스트
image_urls = []

# 크롤링 묶음
def crawling(set_url):
    # 웹사이트의 HTML 가져오기
    response = requests.get(set_url)
    html = response.content

    # BeautifulSoup 객체 생성
    soup = BeautifulSoup(html, 'html.parser')

    # 모든 <img> 태그 찾기
    images = soup.findAll('img')

    # 이미지 URL 추출
    for image in images:
        image_urls.append(image['src'])

def download_image(url, filename):
    response = requests.get(url)
    # with: 파일같은거 열고 뭐 하다가 딴데 가면 자동으로 닫아줌
    with open(path + filename, 'wb') as file:
        file.write(response.content)

# 다운 묶음
def download_pack():
    # 이미지 다운로드
    for i, url in enumerate(image_urls):
        download_image(url, f'image_{int(time.time())}{i}.jpg')

for i in range(1,5):
    set_url = url + str(i)
    crawling(set_url)
vld = [a for a in image_urls if a]

# download_pack()