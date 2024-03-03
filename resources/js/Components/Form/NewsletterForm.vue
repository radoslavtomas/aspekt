<template>
    <div
        v-if="['home', 'njuvinky'].includes(route().current())"
        class="mt-8 bg-gray-200 rounded shadow-md p-4"
    >
        <section class="flex flex-col justify-start">
            <div class="text-center">
                <h5
                    :class="lang[locale].njuvinkySubtitle ? '' : 'mb-2'"
                    class="uppercase font-bold text-pink-600 text-gradient text-lg"
                >
                    <a :href="route('njuvinky', 'vsetko')">{{ lang[locale].njuvinkyTitle }}</a>
                </h5>

                <p v-if="lang[locale].njuvinkySubtitle" class="text-xs mb-4">
                    {{ lang[locale].njuvinkySubtitle }}
                </p>
            </div>

            <form action="#"
                  class="w-full flex justify-center items-center flex-col sm:flex-row mx-auto md:max-w-screen-sm"
                  @submit="handleSubscription">
                <label class="block w-full flex-1 mb-4 sm:mb-0">
                    <input v-model="form.subscribe_email"
                           class="text-sm py-2.5 block w-full shadow-sm rounded border-r sm:border-r-0 sm:rounded-r-none sm:rounded-l"
                           name="subscribe_email"
                           placeholder="Email"
                           required
                           type="email">

                    <div v-if="v$.subscribe_email.$errors.length" class="sm:hidden">
                        <ValidationErrors :error="v$.subscribe_email.$errors[0].$uid"/>
                    </div>
                </label>

                <button
                    class="text-sm text-white text-center px-4 py-2.5 shadow-sm border border-pink-500 bg-pink-500 hover:bg-pink-600 rounded sm:rounded-l-none  sm:rounded-r"
                    type="submit">
                    {{ lang[locale].njuvinkySubscribeButton }}
                    <ArrowPathIcon v-if="sendingSubscription" class="w-5 h-5 inline animate-spin"/>
                    <HandThumbUpIcon v-else class="w-4 h-4 ml-1 inline"/>
                </button>
            </form>
            <div v-if="v$.subscribe_email.$errors.length" class="hidden sm:block w-full mx-auto md:max-w-screen-sm">
                <ValidationErrors :error="v$.subscribe_email.$errors[0].$uid"/>
            </div>
            <div
                v-if="subscription.attempted"
                class="flex flex-col items-center justify-center mt-2 max-w-screen-sm mx-auto text-sm">
                <span
                    v-if="subscription.accepted"
                    class="text-green-700">
                    {{ lang[locale].njuvinkyRegistrationSuccess }}
                    <CheckIcon class="w-4 h-4 ml-1 inline-block"/>
                </span>
                <div
                    v-else
                    class="text-red-700">
                    {{ lang[locale].njuvinkyRegistrationError }}
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import axios from 'axios'
import { ArrowPathIcon, CheckIcon, HandThumbUpIcon } from '@heroicons/vue/24/outline'
import { computed, reactive, ref } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { useStore } from 'vuex'
import useVuelidate from '@vuelidate/core'
import { email, maxLength, required } from '@vuelidate/validators'
import ValidationErrors from '@/Components/Form/ValidationErrors.vue'

const store = useStore()

const lang = computed(() => store.getters.lang)
const locale = computed(() => usePage().props.value.locale)
const sendingSubscription = ref(false)
const subscription = ref({
    attempted: false,
    accepted: null
})
const form = reactive({
    'subscribe_email': ''
})

const rules = computed(() => {
    return {
        subscribe_email: { required, email, maxLength: maxLength(100) },
    }
})

const v$ = useVuelidate(rules, form, { $scope: false })

const handleSubscription = async (event) => {
    console.log('sending newsfilter')
    event.preventDefault()

    // prevent from sending subscription twice
    if (sendingSubscription.value) return

    sendingSubscription.value = true

    // validate
    const formValid = await v$.value.$validate()

    if (!formValid) {
        sendingSubscription.value = false
        return
    }

    // attempt to subscribe
    const response = await axios.post('/njuvinky/subscribe', form)
    console.log(response)

    // clean and respond
    sendingSubscription.value = false
    subscription.value.attempted = true
    subscription.value.accepted = response.data.accepted
}
</script>

<style scoped>

</style>
