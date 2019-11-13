import Vue from 'vue'
import Router from 'vue-router'
import HomeComponent from './components/Home/HomeComponent'
import HistoryComponent from './components/Other/HistoryComponent'
import NewsComponent from './components/Other/NewsComponent'
import MusicInstruments from './components/Other/MusicInstruments'
import TeachersComponent from './components/Other/TeachersComponent'
import IntroductionComponent from './components/Introduction/IntroductionComponent'
import AchievementsComponent from './components/Other/AchievementsComponent'

import GalleryComponent from './components/Other/GalleryComponent'
import ContactsComponent from './components/Other/ContactsComponent'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {   path: '/', name: 'home', component: HomeComponent   },
        {   path: '/', name: 'history', component: HistoryComponent },
        {   path: '/', name: 'news', component: NewsComponent },

        {   path: '/', name: 'teachers', component: TeachersComponent },
        {   path: '/', name: 'instruments', component: MusicInstruments },

        {   path: '/', name: 'introduction', component: IntroductionComponent },
        {   path: '/', name: 'achievements', component: AchievementsComponent },
        {   path: '/', name: 'gallery', component: GalleryComponent },
        {   path: '/', name: 'contacts', component: ContactsComponent }
    ]
})
