<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

    <!-- 반복문 -->
    <a v-for="(item, i) in navList" :key="i">{{ i + item }}</a>
    <!-- :key에 item이라 적어도 그냥 키가 i 인 상태로 돌아간다? -->
  </div>

  <!-- 모달 -->
  <transition name="modalAni">
    <div class="bg_black" v-if="modalFlg">
      <div class="bg_white">
        <img :src="products[modalId].img" alt="이미지">
        <h4>상품명: {{products[modalId].name}}</h4>
        <p>상품 설명: {{products[modalId].content}}</p>
        <p>가격: {{products[modalId].price}}원</p>
        <p>신고수: {{products[modalId].reportCnt}}</p>
        <button @click="modalFlg = false">닫기</button>
      </div>
    </div>
  </transition>

  <!-- 상품 리스트 -->
  <div>
    <div v-for="(item, i) in products" :key="i">
      <h4 @click="modalFlg = true; modalId = i;" :style="sty_color_red">{{ item.name }}</h4>
      <!-- 이벤트 명령이 2개 이상이면 함수로 만들어서 빼는거 추천 -->
      <p>{{ item.price }} 원</p>
      <button @click="plusOne(i)">신고</button>
      <!-- <button @mouseover="item.reportCnt++">신고</button> 호버 기능-->
      <span>신고수: {{ item.reportCnt }}</span>
    </div>
  </div>
</template>

<script>
import data from './assets/js/data.js'; // js에 있는 기능

export default {
  name: 'App',

  // 데이터 바인딩: 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      sty_color_red: 'color: red',
      products: data,
      navList: ['홈', '상품', '기타'],
      modalFlg: false,
      modalId: null // 쌤은 변수에 객체를 담아버렸음 변수 = for->item{}
    }
  },


  // method(): 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    }
  }
}
</script>

<style>
@import url('./assets/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/*  231120 common.css로 옮김
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  color: white;
  padding: 10px;
  text-decoration: none;
} */
</style>
