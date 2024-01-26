import { createStore, Store } from 'vuex';

const store = createStore({
  state: initalState,
  mutations: {
    SET_COUNT(state, count) {
      state.count = count;
    },
  },
  actions: {
    INCREASE({ state, commit }) {
      commit('SET_COUNT', state.count + 1);
    },
    DECREASE({ state, commit }) {
      commit('SET_COUNT', state.count - 1);
    },
  },
});