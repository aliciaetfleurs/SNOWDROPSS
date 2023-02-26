<template>
    <div>
        <button v-if="isFollow == true" type="button" v-on:click="follow" class="followBtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M14 11h8v2h-8zM4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"></path></svg>
        </button>
        <button v-else type="button" v-on:click="follow" class="unFollowBtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5-1.505-3.5-3.5-3.5-3.5 1.505-3.5 3.5zM19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1h2z"></path></svg>
        </button>
    </div>
</template>

<script>
export default {
  props: {
    artist_id : {
      type: Number
    },
    is_follow: {
      type: Boolean
    }
  },
  data() {
    return {
      status: false,
      isFollow: this.is_follow
    }
  },
  methods: {
   follow() {    
      const id = this.artist_id;
      let isFollowed = this.isFollow;
      const path = "http://localhost/intern/musicdistributionsite/public/artists/" + id + "/follows";
      const data = {artist_id: id, isFollow: isFollowed};
      console.log(isFollowed);
      axios.post(path, data).then(res => {
        this.isFollow = !this.isFollow
      }).catch(function(err) {
        console.log(err);
      })
    }
  }
}
</script>