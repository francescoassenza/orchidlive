<template>
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                Add New Owner
            </h2>
            <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
                Or
                <a href="/"
                   class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    cancel and go back
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form @submit.prevent="submit">
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded-lg"
                         v-show="success">
                        <p>Owner created. <a href="/" class="font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Go back?
                        </a></p>
                    </div>
                    <div>
                        <label for="forename" class="block text-sm font-medium leading-5  text-gray-700">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input
                                id="forename"
                                name="forename"
                                v-model="fields.forename"
                                type="text"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div v-if="errors && errors.forename" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors && errors.forename">{{ errors.forename[0] }}</p>
                    </div>

                    <div class="mt-6">
                        <label for="surname" class="block text-sm font-medium leading-5  text-gray-700">Surname</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input
                                id="surname"
                                name="surname"
                                v-model="fields.surname"
                                type="text"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div v-if="errors && errors.surname" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors && errors.surname"> {{ errors.surname[0] }}</p>
                    </div>

                    <div class="mt-6">
                        <label for="email" class="block text-sm font-medium leading-5  text-gray-700">
                            Email
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input
                                id="email"
                                name="email"
                                v-model="fields.email"
                                type="text"
                                placeholder="user@example.com"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div v-if="errors && errors.email" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors && errors.email">{{ errors.email[0] }}</p>
                    </div>

                    <div class="mt-6">
                        <label for="phone" class="block text-sm font-medium leading-5  text-gray-700">Phone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input
                                id="phone"
                                name="phone"
                                v-model="fields.phone"
                                type="text"
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <div v-if="errors && errors.phone" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500" v-if="errors && errors.phone">{{ errors.phone[0] }}</p>
                    </div>

                    <div class="mt-6">
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                                Create
                            </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fields: {},
            success: false,
            errors: {},
        }
    },
    methods: {
        submit() {
            axios.post('/owner', this.fields).then(response => {
                this.fields = {};
                this.success = true;
                this.errors = {};
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        }
    }
}
</script>
