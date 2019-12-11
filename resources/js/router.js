import Vue from "vue";
import Router from "vue-router";
import HomeComponent from "./components/Home/HomeComponent";
import HistoryComponent from "./components/Other/HistoryComponent";
import NewsComponent from "./components/Other/NewsComponent";
import MusicInstruments from "./components/Other/MusicInstruments";
import TeachersComponent from "./components/Other/TeachersComponent";
import IntroductionComponent from "./components/Introduction/IntroductionComponent";
import DepartmentsComponent from "./components/Departments/DepartmentsComponent";
import AchievementsComponent from "./components/Other/AchievementsComponent";

import GalleryComponent from "./components/Other/GalleryComponent";
import ContactsComponent from "./components/Other/ContactsComponent";
import NewsItemComponent from "./components/Other/NewsItemComponent";
import AchievementItemComponent from "./components/Other/AchievementItemComponent";

Vue.use(Router);

export default new Router({
    mode: "history",
    routes: [
        { path: '/', name: 'home', component: HomeComponent },
        { path: '/history', name: 'history', component: HistoryComponent },
        { path: '/news1', name: 'news', component: NewsComponent },

        { path: "/teachers", name: "teachers", component: TeachersComponent },

        {
            path: "/instruments",
            name: "instruments",
            component: MusicInstruments
        },
        {
            path: "/introduction",
            name: "introduction",
            component: IntroductionComponent
        },
        {
            path: "/achievements",
            name: "achievements",
            component: AchievementsComponent
        },
        {
            path: "/departments",
            name: "departments",
            component: DepartmentsComponent
        },
        { path: "/gallery", name: "gallery", component: GalleryComponent },
        { path: "/contacts", name: "contacts", component: ContactsComponent },
        { path: "/news-item/:id/", name: "news-item", component: NewsItemComponent},
        { path: "/achievements-item", name: "achievements-item", component: AchievementItemComponent}
    ]
});
