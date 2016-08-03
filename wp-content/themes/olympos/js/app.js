var App = Vue.extend({});

// postList Component
var postList = Vue.extend({
  template: '#post-list-template',

  data: function() {
    return {
      posts: '',
      categories: '',
      nameFilter: '',
      categoryFilter: '',
      showFilter: false,
      filterBtnOpen: true,
      filterBtnClose: false
    }
  },

  ready: function() {
    this.$http.get('/wp-api-vue/wp-json/wp/v2/posts?per_page=20').then(function(response) {
      this.$set('posts', response.json())
    })
    this.$http.get('/wp-api-vue/wp-json/wp/v2/categories').then(function(response) {
      this.$set('categories', response.json())
    })
  },

  methods: {
    openFilter: function() {
      this.$set('showFilter', true);
      this.$set('filterBtnOpen', false);
      this.$set('filterBtnClose', true);
    },
    closeFilter: function() {
      this.$set('showFilter', false);
      this.$set('filterBtnOpen', true);
      this.$set('filterBtnClose', false);
    }
  }
});




// Router & Routes
var router = new VueRouter();

router.map({
  '/': {
    component: postList
  }
});

router.start(App, '#app');
