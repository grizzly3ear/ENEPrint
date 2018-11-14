import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    currentPage: 'profile',
    userId: '',
    allCourses: [],
    courses: []
  },
  mutations: {
    changeCurrentPage: (state, page) => {
      state.currentPage = page
    },
    setUserId: (state, id) => {
      state.userId = id
    },
    setAllCourses: (state, allCourses) => {
      state.allCourses = allCourses
    },
    setCourses: (state, courses) => {
      state.courses = courses
    }
  },
  actions: {
    changeCurrentPage: ({ commit }, page) => {
      commit('changeCurrentPage', page)
    },
    setUserId: ({ commit }, id) => {
      commit('setUserId', id)
    },
    setAllCourses: ({ commit }, allCourses) => {
      commit('setAllCourses', allCourses)
    },
    setCourses: ({ commit }, courses) => {
      commit('setCourses', courses)
    }
  },
  getters: {
    getCurrentPage: (state) => {
      return state.currentPage
    },
    getUserId: (state) => {
      return state.userId
    },
    getAllCourses: (state) => {
      return state.allCourses
    },
    getCourses: (state) => {
      return state.courses
    }
  }
})
