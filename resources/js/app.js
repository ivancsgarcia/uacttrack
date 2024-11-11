import "./bootstrap";
import Account from "../js/components/global/Account.vue";
import SearchBar from "../js/components/global/SearchBar.vue";
import SideMenu from "./components/global/SideMenu.vue";
import AdminSideMenu from "./components/global/AdminSideMenu.vue";
import UAHeader from "../js/components/global/UAheader.vue";
import Modal from "../js/components/global/Modal.vue";
import PaginationLinks from "./components/global/PaginationLinks.vue";
import SystemSideMenu from "./components/global/SystemSideMenu.vue";

import Button from "primevue/button";
import ToggleSwitch from "primevue/toggleswitch";
import Dialog from "primevue/dialog";
import Avatar from "primevue/avatar";
import Popover from "primevue/popover";
import Card from "primevue/card";
import ConfirmDialog from "primevue/confirmdialog";
import ConfirmationService from "primevue/confirmationservice";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import Image from "primevue/image";
import "primeicons/primeicons.css";
import VCalendar from "v-calendar";
import "v-calendar/style.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from "@fortawesome/free-solid-svg-icons";
library.add(fas);

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import PrimeVue from "primevue/config";
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
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    options: {
                        darkModeSelector: false,
                    },
                },
            })
            .use(ConfirmationService)
            .use(ToastService)
            .use(VCalendar, {})
            .component("font-awesome-icon", FontAwesomeIcon)
            .component("Account", Account)
            .component("SearchBar", SearchBar)
            .component("SideMenu", SideMenu)
            .component("UAHeader", UAHeader)
            .component("Modal", Modal)
            .component("PaginationLinks", PaginationLinks)
            .component("SystemSideMenu", SystemSideMenu)
            .component("Button", Button)
            .component("ToggleSwitch", ToggleSwitch)
            .component("Dialog", Dialog)
            .component("Avatar", Avatar)
            .component("Popover", Popover)
            .component("Card", Card)
            .component("ConfirmDialog", ConfirmDialog)
            .component("Toast", Toast)
            .component("Image", Image)
            .component("AdminSideMenu", AdminSideMenu)
            .mount(el);
    },
});

setThemeOnLoad();
