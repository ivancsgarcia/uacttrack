import "./bootstrap";
import Account from "../js/components/global/Account.vue";
import SearchBar from "../js/components/global/SearchBar.vue";
import SideMenu from "./components/global/SideMenu.vue";
import AdminSideMenu from "./components/global/AdminSideMenu.vue";
import UAHeader from "../js/components/global/UAheader.vue";
import Modal from "../js/components/global/Modal.vue";
import MyButton from "../js/components/global/MyButton.vue";
import MyToggleSwitch from "../js/components/global/MyToggleSwitch.vue";
import MyDatePicker from "../js/components/global/MyDatePicker.vue";
import MyTimePicker from "../js/components/global/MyTimePicker.vue";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";
/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
/* import specific icons */
import { fas } from "@fortawesome/free-solid-svg-icons";
/* add icons to the library */
library.add(fas);

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import PrimeVue from "primevue/config";
// import { PrimeIcons } from '@primevue/core/api';
import { setThemeOnLoad } from "./theme";
import Aura from "@primevue/themes/aura";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            // .use(PrimeVue, { unstyled: true })
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                },
            })
            .component("font-awesome-icon", FontAwesomeIcon)
            .component("Account", Account)
            .component("SearchBar", SearchBar)
            .component("SideMenu", SideMenu)
            .component("UAHeader", UAHeader)
            .component("Modal", Modal)
            .component("MyButton", MyButton)
            .component("MyToggleSwitch", MyToggleSwitch)
            .component("MyDatePicker", MyDatePicker)
            .component("MyTimePicker", MyTimePicker)
            .component("AdminSideMenu", AdminSideMenu)
            .mount(el);
    },
});

setThemeOnLoad();
