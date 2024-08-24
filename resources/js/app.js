import './bootstrap';

import { createApp } from 'vue';
import app from './components/App.vue';
import router from './router'
import Account from './components/global/Account.vue';
import SearchBar from './components/global/SearchBar.vue';
import SideBar from './components/global/Sidebar.vue';
import UAHeader from './components/global/UAheader.vue';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { fas } from '@fortawesome/free-solid-svg-icons'
/* add icons to the library */
library.add(fas)

createApp(app)
.use(router)
.component('font-awesome-icon', FontAwesomeIcon)
.component('Account', Account)
.component('SearchBar', SearchBar)
.component('SideBar', SideBar)
.component('UAHeader', UAHeader)
.mount("#app")
