var App = Vue.extend({});

// postList Component
var postList = Vue.extend({
  template: '#post-list-template',

  data: function() {
    return {
      posts: '',
      categories: '',
      nameFilter: '',
      categoryFilter: ''
    }
  },

  ready: function() {
    this.$http.get('/wp-api-vue/wp-json/wp/v2/posts?per_page=20').then(function(response) {
      this.$set('posts', response.json())
    })
    this.$http.get('/wp-api-vue/wp-json/wp/v2/categories').then(function(response) {
      this.$set('categories', response.json())
    })
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
