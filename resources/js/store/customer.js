const state = {
    customer: {},
};

const mutations = {
    setCustomer(state, payload) {
        state.customer = payload
    },

};

const actions = {
    setCustomer({ commit }, payload) {
        commit('setCustomer', payload);
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
