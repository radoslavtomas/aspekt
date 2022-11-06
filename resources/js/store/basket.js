const state = {
    basket: [],
    counter: 0
};

const mutations = {
    addToBasket(state, payload) {
        if(isInBasket(state.basket, payload.book_id)) {
            incrementBookCount(state.basket, payload.book_id)
        } else {
            addNewBookToBasket(state.basket, payload)
        }
    }
};

const actions = {
    addToBasket({ commit }, payload) {
        commit('addToBasket', payload)
    },
};

const getters = {
    counter(state) {
        return state.counter;
    },
};

const isInBasket = (basket, book_id) => basket.some(book => book.book_id === book_id);
const addNewBookToBasket = (basket, book) => {
    book['qty'] = 1;
    basket.push(book);
}
const incrementBookCount = (basket, book_id) => {
    for (const book of basket) {
        if (book.book_id === book_id) {
            book.qty++;
            break;
        }
    }
}


export default {
    state,
    mutations,
    actions,
    getters,
};
