import Vuex from 'vuex'

import auth from './modules/auth'

const createStore = () => {
    return new Vuex.Store({
        namespaced: true,
        strict: true,

        modules: {
            // auth
        }
    })
}
 
export default createStore