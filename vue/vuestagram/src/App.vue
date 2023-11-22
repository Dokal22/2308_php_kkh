<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li 
        v-if="$store.state.flgTapUI !== 0"
        class="header-button header-button-left"
        @click="cancel"
      >취소</li>
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li 
        v-if="$store.state.flgTapUI === 1"
        @click="addBoard()"
        class="header-button header-button-right"
        >작성</li>
    </ul>
  </div>

  <!-- <p>{{ $store.state.phptest }}</p> store 가져오기 테스트-->

  <!-- 컨테이너 -->
  <ContainerComponent />
  
  <!-- 더보기버튼 -->
  <button v-if="$store.state.PushFlg === 0" @click="moreView()">더보기</button>

  <!-- 푸타 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  created() {
    this.$store.dispatch('actionGetBoardList') // action호출 => dispatch()
  },
  methods: {
    cancel(){
      this.$store.commit('setFlgTabUI', 0);
    },
    // 작성 페이지 이동 및 이미지 관리
    updateImg(e) { // change할 때 뭐가 바뀌었는지 데이터가 자동으로 생김. 지금은 e로받을 것임
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기 위한 셋팅
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTabUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
      console.log(imgURL);
    },
    // 작성처리
    addBoard(){
      this.$store.dispatch('actionPostBoardAdd');
    },
    moreView(){
      this.$store.dispatch('actionOneMoreGetBoard')
    },
  },
  components: {
    ContainerComponent,
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
</style>
