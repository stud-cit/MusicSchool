export default {
    data() {
        return {
            page: {
                description: '',
                title: '',
                uptitle: '',
                shirt_text: ''
            }
        }
    },

    methods: {
        getInfoPage(page) {
            axios.get('/api/page-info/'+page)
            .then((response) => {
                var info = response.data.title.split(" ");
                this.page.title = info[info.length - 1];
                info.pop();
                this.page.uptitle = info.join(' ');
                this.page.description = response.data.text;
                this.page.shirt_text = response.data.shirt_text;
            })
        },
    }
}