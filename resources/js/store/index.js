import { createStore } from 'vuex'

import basket from "@/store/basket";

// Create a new store instance.
const store = createStore({
    modules: {
        basket,
    }
})

export default store;
