const state = {
    basket: [],
    counter: 0
};

const mutations = {
    addToBasket(state, payload) {
        if(isInBasket(state.basket, payload.book_id)) {
            incrementBookCount(state.basket, payload.book_id);
        } else {
            addNewBookToBasket(state.basket, payload);
        }
    },
    incrementBookCount(state, payload) {
        console.log(payload)
        incrementBookCount(state.basket, payload.book_id);
    },
    incrementBookCountBy(state, payload) {
        incrementBookCountBy(state.basket, payload.book_id, payload.qty);
    },
    decrementBookCount(state, payload) {
        decrementBookCount(state.basket, payload.book_id);
    },
    removeBookFromBasket(state, payload) {
        state.basket = removeBookFromBasket(state.basket, payload.book_id);
    }
};

const actions = {
    addToBasket({ commit }, payload) {
        commit('addToBasket', payload);
    },
    incrementBookCount({ commit }, payload) {
        commit('incrementBookCount', payload);
    },
    incrementBookCountBy({ commit }, payload) {
        commit('incrementBookCountBy', payload);
    },
    decrementBookCount({ commit }, payload) {
        commit('decrementBookCount', payload);
    },
    removeBookFromBasket({ commit}, payload) {
        commit('removeBookFromBasket', payload);
    }
};

const getters = {
    basket(state) {
        return state.basket;
    },
    counter(state) {
        return getCounter(state.basket);
    },
    subtotal(state) {
        return getSubtotal(state.basket);
    }
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

const incrementBookCountBy = (basket, book_id, qty) => {
    for (const book of basket) {
        if (book.book_id === book_id) {
            book.qty = qty;
            break;
        }
    }
}

const decrementBookCount = (basket, book_id) => {
    for (const book of basket) {
        if (book.book_id === book_id) {
            book.qty--;
            break;
        }
    }
}

const removeBookFromBasket = (basket, book_id) => {
    return basket.filter(book => book.book_id !== book_id);
}

const getCounter = (basket) => basket.reduce((previousValue, currentValue) => previousValue + currentValue.qty, 0);

const getSubtotal = (basket) => {
    if(basket.length === 0) {
        return 0;
    }

    const subtotalRaw = basket.reduce((previousValue, currentValue) => {
        return previousValue + (currentValue.price * currentValue.qty);
    }, 0) / 100;

    return new Intl.NumberFormat('sk-SK', { style: 'currency', currency: 'EUR' }).format(subtotalRaw);
};

export default {
    state,
    mutations,
    actions,
    getters,
};
