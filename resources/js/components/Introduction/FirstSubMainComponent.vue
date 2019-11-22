<template>
  <div>
    <b-container>
      <div class="article__block">
        <b-row>
          <div xl="4" lg="4" md="12" sm="12" cols="12">
            <div class="article">
              <b-row>
                <div class="article__title">
                  <div class="article__title__small">Lorem ipsum dolor sit amet.</div>
                  <div class="article__title__big">Lorem, ipsum dolor.</div>
                </div>
              </b-row>
              <b-row>
                <div class="article__body">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry
                  Lorem Ipsum is simply dummy text of the printing orem
                  Ipsum is simply dummy text of the printing and typesetting industry
                  Lorem Ipsum is simply dummy text of the printing
                </div>
              </b-row>
            </div>
          </div>
          <div xl="4" lg="4" md="12" sm="12" cols="12" class="article__img">
            <div class="article__img">
              <img src="/img/introduction/article_img.png" alt="Image with kids" />
            </div>
          </div>
        </b-row>
      </div>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "FirstSubMainComponent"
};
</script>

<style>
.article__title {
  font-family: "Montserrat Bold", sans-serif;
}

.article__title__small {
  font-size: 32px;
}
.article__title__big {
  font-size: 80px;
}
</style>