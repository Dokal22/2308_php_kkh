<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->
  <Header :Usan="navList" />
  <!-- 
  <div class="nav">
    반복문
    <a v-for="(item, i) in navList" :key="i">{{ i + item }}</a> 231121 ->components/Header
    :key에 item이라 적어도 그냥 키가 i 인 상태로 돌아간다?
  </div> 
  -->

  <!-- 할인 -->
  <Discount /> <!-- 한번에 여닫 -->
  <!-- <div class="discount"> 231121 ->components/Discount
    <p>싸다싸 50%</p>
  </div> -->

  <!-- 모달 -->
  <transition name="modalAni">
    <Modal v-if="modalFlg" :modalProduct="modalProduct" @modalClose="modalClose" />
    <!-- <div class="bg_black" v-if="modalFlg"> 231121 ->components/Modal
      <div class="bg_white">
        <img :src="products[modalId].img" alt="이미지">
        <h4>상품명: {{products[modalId].name}}</h4>
        <p>상품 설명: {{products[modalId].content}}</p>
        <p>가격: {{products[modalId].price}}원</p>
        <p>신고수: {{products[modalId].reportCnt}}</p>
        <button @click="modal(false)">닫기</button>
      </div>
    </div> -->
  </transition>

  <!-- 상품 리스트 -->
  <div>
    <Item 
      v-for="(item, i) in products" :key="i" 
      @modalOpen="modalOpen" 
      @plusOne="plusOne" 
      :i="i" 
      :item="item" 
    />
    <!-- :products="products"  -->
    <!-- <div v-for="(item, i) in products" :key="i"> 231121 ->components/Item
      <h4 @click="modal(true)" :style="sty_color_red">{{ item.name }}</h4>
      이벤트 명령이 2개 이상이면 함수로 만들어서 빼는거 추천
      <p>{{ item.price }} 원</p>
      <button @click="plusOne(i)">신고</button>
      <button @mouseover="item.reportCnt++">신고</button> 호버 기능
      <span>신고수: {{ item.reportCnt }}</span>
    </div> -->
  </div>
</template>

<script>
import data from './assets/js/data.js'; // js에 있는 기능

import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import Item from './components/Item.vue';

export default {
  name: 'App',

  // 데이터 바인딩: 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      sty_color_red: 'color: red',
      products: data,
      navList: ['홈', '상품', '기타'],
      modalFlg: false,
      modalProduct: {}, // 쌤은 변수에 객체를 담아버렸음. '변수' = for->item{}
    }
  },

  // method(): 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct = item;
    },
    modalClose() {
      this.modalFlg = false;
    },
  },

  // components: 컴포넌트 등록
  components: {
    Discount,
    Header,
    Modal,
    Item,
  },
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
