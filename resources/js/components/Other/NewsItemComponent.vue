<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">
                <div class="news-item">
                    <router-link :to="{ name: 'news'}">Всі новини</router-link>
                    <div class="news-item-container">
                        <img :src="this.$route.params.img" alt="" class="news-item-img">
                        <div class="news-item-description">
                            <h3 class="news-item-title"> {{ this.$route.params.title }}</h3>
                            <h3 class="news-item-date"> {{ this.$route.params.date }}</h3>
                        </div>
                        <hr class="news-item-line">
                        <div class="news-item-text">
                            <p>{{ this.$route.params.text }}</p>
                        </div>
                        <div class="news-item-subwrapper"></div>
                    </div>
                </div>
            </b-container>
        </section>
    </div>
</template>

<script>
    export default {
        name: "NewsItemComponent",
    }
</script>

<style scoped>

</style>
