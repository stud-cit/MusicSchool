<template>
  <div>
    <page-title title="інструментів" uptitle="Різноманітність"></page-title>
    <section class="instruments-section mt-50">
      <div class="content-block">
        <div class="content-layout"></div>
        <b-container>
            div
            class="text_block"
          >Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim repudiandae voluptatem, cum suscipit dignissimos itaque officia aliquam numquam veniam provident deserunt id illum perferendis earum rerum nostrum. Nulla expedita rerum commodi cumque repellendus at iure numquam, adipisci, veniam labore dolores. Repellat maiores fuga ipsum praesentium pariatur perferendis alias? Incidunt, eveniet.</div>
          <ul class="instrument-list">
            <li class="list-item" v-for="item of paginateList">
              <div class="description">
                <h3 class="item-title">Рояль {{item.id}}</h3>
                <p class="text">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem
                  Ipsum is simply dummy text of the printing orem Ipsum is simply
                  dummy text of the printing and typesetting industry Lorem Ipsum is simply dummy text of the printing
                </p>
              </div>
              <img src="/img/instruments-1.png" alt class="w-100 item-img" />
            </li>
          </ul>
        </b-container>
      </div>
      <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        first-text="<<"
        prev-text="<"
        next-text=">"
        last-text=">>"
        class="justify-content-center"
      ></b-pagination>
    </section>
  </div>
</template>

<script>
export default {
  data() {
    return {
      perPage: 3,
      currentPage: 1,
      items: [
        { id: 1 },
        { id: 2 },
        { id: 3 },
        { id: 4 },
        { id: 5 },
        { id: 6 },
        { id: 7 },
        { id: 8 },
        { id: 9 }
      ]
    };
  },
  computed: {
    rows() {
      return this.items.length;
    },
    paginateList() {
      return this.items.slice(
        (this.currentPage - 1) * this.perPage,
        this.currentPage * this.perPage
      );
    }
  }
};
</script>

<style lang="sass" scoped>
    .instruments-section
        .content-block
            position: relative
            .content-layout

                position: absolute
                width: 50%
                left: 0
                top: 200px
                height: calc(100% - 400px)
                background-image: linear-gradient(180deg, #e91b47 0%, #6a0017 100%)
                z-index: -1

                
            .text_block
                padding: 70px 50px
                background-color: #2B2B2B
                color: #FFFFFF
                margin-bottom: 50px

            .instrument-list
                z-index: 5
                list-style: none
                display: flex
                flex-direction: column
                justify-content: center
                .list-item
                    padding-left: 280px
                    position: relative
                    display: block
                    margin-bottom: 40px
                    .description
                        position: absolute
                        right: 40%
                        top: 50%
                        transform: translateY(-50%)
                        box-shadow: 5px 5px 25px rgba(0, 0, 0, 0.16)
                        background-color: #ffffff
                        padding: 35px 50px
                    &:last-of-type
                        margin-bottom: 0

</style>


