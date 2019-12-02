<template>
    <div>
        <page-title title="актуальні" uptitle="новини"></page-title>
        <section class="history-section mt-50">
            <b-container class="news-list">
                <div class="news-item">
                    <b-nav-item href="/news">Всі новини</b-nav-item>
                    <div class="news-item-container">
                        <img src="" alt="" class="news-item-img">
                        <div class="news-item-description">
                            <h3 class="news-item-title"></h3>
                            <h3 class="news-item-date"></h3>
                        </div>
                        <hr class="news-item-line">
                        <div class="news-item-text">
                            <p></p>
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
        name: "NewsItemComponent"
    }
</script>

<style scoped>

</style>
