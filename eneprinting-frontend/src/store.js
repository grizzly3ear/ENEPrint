import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    currentPage: 'profile',
    userId: '',
    allCourses: [],
    courses: [],
    files: [],
    loading: false
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
    },
    setFiles: (state, files) => {
      state.files = files
    },
    setLoading: (state, loading) => {
      state.loading = loading
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
    },
    setFiles: ({ commit }, files) => {
      commit('setFiles', files)
    },
    setLoading: ({ commit }, loading) => {
      commit('setLoading', loading)
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
    },
    getFiles: (state) => {
      return state.files
    },
    getLoading: (state) => {
      return state.loading
    }
  }
})
