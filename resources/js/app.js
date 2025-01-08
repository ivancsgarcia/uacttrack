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
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';
import Password from 'primevue/password';
import Checkbox from 'primevue/checkbox';
import InputNumber from 'primevue/inputnumber';
import Textarea from 'primevue/textarea';
import Select from 'primevue/select';
import FileUpload from 'primevue/fileupload';
import InputText from 'primevue/inputtext';
import ToggleSwitch from "primevue/toggleswitch";
import Dialog from "primevue/dialog";
import Avatar from "primevue/avatar";
import Popover from "primevue/popover";
import Card from "primevue/card";
import Divider from "primevue/divider";
import ConfirmDialog from "primevue/confirmdialog";
import ConfirmationService from "primevue/confirmationservice";
import Toast from "primevue/toast";
import ToastService from "primevue/toastservice";
import Image from "primevue/image";
import "primeicons/primeicons.css";
import VCalendar from "v-calendar";
import "v-calendar/style.css";

import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from "@fortawesome/free-solid-svg-icons";
library.add(fas);

import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import PrimeVue from "primevue/config";

createInertiaApp({
    title: (title) => `UActTrack ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    progress: {
        color: "#272f5c",
        includeCSS: true,
        showSpinner: true,
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: "none",
            })
            .use(ConfirmationService)
            .use(ToastService)
            .use(VCalendar, {})
            .component("font-awesome-icon", FontAwesomeIcon)
            .component("Head", Head)
            .component("Link", Link)
            .component("Account", Account)
            .component("SearchBar", SearchBar)
            .component("SideMenu", SideMenu)
            .component("UAHeader", UAHeader)
            .component("Modal", Modal)
            .component("PaginationLinks", PaginationLinks)
            .component("SystemSideMenu", SystemSideMenu)
            .component("Button", Button)
            .component("FileUpload", FileUpload)
            .component("InputGroup", InputGroup)
            .component("InputGroupAddon", InputGroupAddon)
            .component("Password", Password)
            .component("Checkbox", Checkbox)
            .component("InputNumber", InputNumber)
            .component("Textarea", Textarea)
            .component("Select", Select)
            .component("InputText", InputText)
            .component("ToggleSwitch", ToggleSwitch)
            .component("Dialog", Dialog)
            .component("Avatar", Avatar)
            .component("Popover", Popover)
            .component("Card", Card)
            .component("ConfirmDialog", ConfirmDialog)
            .component("Toast", Toast)
            .component("Image", Image)
            .component("Divider", Divider)
            .component("AdminSideMenu", AdminSideMenu)
            .component("VueDatePicker", VueDatePicker)

            .mount(el);
    },
});

setThemeOnLoad();
