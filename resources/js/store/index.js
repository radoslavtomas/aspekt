import { createStore } from 'vuex'

import basket from "@/store/basket";
import customer from "@/store/customer";
import lang from "@/store/lang";

// Create a new store instance.
const store = createStore({
    modules: {
        basket,
        customer,
        lang,
    }
})

export default store;
