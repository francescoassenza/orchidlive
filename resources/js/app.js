import './bootstrap';
import { createApp } from "vue";
import CreateOwner from "./Components/CreateOwner.vue";

const app = createApp({});

app.component("create-owner", CreateOwner);

app.mount("#app");
