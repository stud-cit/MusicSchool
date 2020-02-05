require('./bootstrap');

window.Vue = require("vue");

import VueRouter from 'vue-router'
import VeeValidate, { Validator } from 'vee-validate';
import uk from 'vee-validate/dist/locale/uk';

import HomeComponent from './components/Admin/HomeComponent'
import AchieveComponent from './components/Admin/AchieveComponent'
import PageInfoComponent from './components/Admin/PageInfoComponent'
import DepartmentComponent from './components/Admin/DepartmentComponent'
import GalleryComponent from './components/Admin/GalleryComponent'
import InfoComponent from './components/Admin/InfoComponent'
import InstrumentComponent from './components/Admin/InstrumentComponent'
import EditInstrumentsComponent from './components/Admin/EditInstrumentsComponent'
import EditTeachersComponent from './components/Admin/EditTeachersComponent'
import IntroComponent from './components/Admin/IntroComponent'
import NewsComponent from './components/Admin/NewsComponent'
import EditNewsComponent from "./components/Admin/EditNAS/EditNewsComponent";
import EditAchieveComponent from "./components/Admin/EditNAS/EditAchieveComponent";
import EditDepartmentComponent from "./components/Admin/EditNAS/EditDepartmentComponent";
import EditStoryComponent from "./components/Admin/EditNAS/EditStoryComponent";
import StoryComponent from './components/Admin/StoryComponent'
import TeacherComponent from './components/Admin/TeacherComponent'
import ProfileComponent from './components/Admin/ProfileComponent'
import SiteInfoComponent from './components/Admin/SiteInfoComponent'

import VueSilentbox from 'vue-silentbox';
Vue.use(VueSilentbox);

Vue.config.productionTip = false;

Validator.localize('uk', uk);

Vue.use(VueRouter);

Vue.use(VeeValidate, {
    locale: 'uk',
});

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            name: 'admin',
            component: HomeComponent
        },
        {
            path: '/admin/page-info',
            name: 'page-info',
            component: PageInfoComponent
        },
        {
            path: '/admin/gallery',
            name: 'gallery',
            component: GalleryComponent
        },
        {
            path: '/admin/department',
            name: 'department',
            component: DepartmentComponent
        },
        {
            path: '/admin/department/:id/',
            name: 'edit-department',
            component: EditDepartmentComponent
        },
        {
            path: '/admin/info',
            name: 'info',
            component: InfoComponent
        },
        {
            path: '/admin/instrument',
            name: 'instrument',
            component: InstrumentComponent
        },
        {
            path: '/admin/instruments/:id/',
            name: 'edit-instruments',
            component: EditInstrumentsComponent
        },
        {
            path: '/admin/intro',
            name: 'intro',
            component: IntroComponent
        },
        {
            path: '/admin/news',
            name: 'news',
            component: NewsComponent
        },
        {
            path: '/admin/news/:id/',
            name: 'edit-news',
            component: EditNewsComponent
        },
        {
            path: '/admin/achieve',
            name: 'achieve',
            component: AchieveComponent
        },
        {
            path: '/admin/achieve/:id/',
            name: 'edit-achieve',
            component: EditAchieveComponent
        },
        {
            path: '/admin/story',
            name: 'story',
            component: StoryComponent
        },
        {
            path: '/admin/story/:id/',
            name: 'edit-story',
            component: EditStoryComponent
        },
        {
            path: '/admin/teacher',
            name: 'teacher',
            component: TeacherComponent
        },
        {
            path: '/admin/teacher/:id/',
            name: 'edit-teacher',
            component: EditTeachersComponent
        },
        {
            path: '/admin/profile/:id',
            name: 'profile',
            component: ProfileComponent
        },
        {
            path: '/admin/sites',
            name: 'sites',
            component: SiteInfoComponent
        }
    ],
});

const app = new Vue({
    el: "#admin",
    router
});
