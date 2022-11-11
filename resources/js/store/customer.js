const state = {
    customer: {},
};

const mutations = {
    setCustomer(state, payload) {
        state.customer = payload
    },
    resetCustomer(state) {
        state.customer = {}
    }

};

const actions = {
    setCustomer({ commit }, payload) {
        commit('setCustomer', payload);
    },
    resetCustomer({ commit }) {
        commit('resetCustomer')
    }
};

const getters = {
    customer(state) {
        return state.customer;
    }
};

export default {
    state,
    mutations,
    actions,
    getters,
};
