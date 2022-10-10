const state = {
    counter: 0
};

const mutations = {
    increment(state) {
        state.counter++;
    }
};

const actions = {
    increment({ commit }) {
        commit("increment");
    }
};

const getters = {
    counter(state) {
        return state.counter;
    },
};

export default {
    state,
    mutations,
    actions,
    getters,
};
