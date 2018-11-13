import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    currentPage: 'profile',
    userId: ''
  },
  mutations: {
    changeCurrentPage: (state, page) => {
      state.currentPage = page
    },
    setUserId: (state, id) => {
      state.userId = id
    }
  },
  actions: {
    changeCurrentPage: ({ commit }, page) => {
      commit('changeCurrentPage', page)
    },
    setUserId: ({ commit }, id) => {
      commit('setUserId', id)
    }
  },
  getters: {
    getCurrentPage: (state) => {
      return state.currentPage
    },
    getUserId: (state) => {
      return state.userId
    }
  }
})
