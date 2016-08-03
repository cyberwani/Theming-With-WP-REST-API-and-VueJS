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
      filterBtnClose: false,
      post: '',
      show: false
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
    getThePost: function(id) {
      var posts = this.posts;

      this.$set('show', true);

      function filterPosts(el) {
        return el.id == id;
      }

      this.$set('post', posts.filter(filterPosts));
    },

    closePost: function() {
      this.$set('show', false);
    },

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

//singlePost Component
var singlePost = Vue.extend({
  template: '#single-post-template',

  data: function() {
    return {
      post: ''
    }
  },

  route:{
    data: function(){
      this.$http.get('/wp-api-vue/wp-json/wp/v2/posts/' + this.$route.params.postID).then(function(response){
        this.$set('post', response.json());
      })
    }
  }
});


// Router & Routes
var router = new VueRouter();

router.map({
  '/': {
    component: postList
  },

'post/:postID':{
    name:'post',
    component: singlePost
  }
});

router.start(App, '#app');
