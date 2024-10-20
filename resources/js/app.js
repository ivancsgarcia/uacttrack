import "./bootstrap";
import Account from "../js/components/global/Account.vue";
import SearchBar from "../js/components/global/SearchBar.vue";
import SideMenu from "./components/global/SideMenu.vue";
import AdminSideMenu from "./components/global/AdminSideMenu.vue";
import UAHeader from "../js/components/global/UAheader.vue";
import Modal from "../js/components/global/Modal.vue";

import Button from "primevue/button";
import ToggleSwitch from "primevue/toggleswitch";
import DatePicker from "primevue/datepicker";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Textarea from "primevue/textarea";
import FileUpload from "primevue/fileupload";
import Dialog from 'primevue/dialog';
import Avatar from 'primevue/avatar';
import Popover from 'primevue/popover';
import Card from 'primevue/card';



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
            .component("Button", Button)
            .component("ToggleSwitch", ToggleSwitch)
            .component("DatePicker", DatePicker)
            .component("InputText", InputText)
            .component("InputNumber", InputNumber)
            .component("Select", Select)
            .component("Textarea", Textarea)
            .component("FileUpload", FileUpload)
            .component("Dialog", Dialog)
            .component("Avatar", Avatar)
            .component("Popover", Popover)
            .component("Card", Card)
            .component("AdminSideMenu", AdminSideMenu)
            .mount(el);
    },
});

setThemeOnLoad();
