<template>

	<div class="star-rating">
        <label class="star-rating__star" v-for="rating in ratings" :class="{'is-selected': ((rate >= rating) && value != null), 'is-disabled': disabled}"
        v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">
        	★
        	    	<input type="hidden" class="form-control " name="rate" v-model="rate"/>
    	</label>

    </div>

</template>

<script>
export default {
 props: {
    'name': String,
    'value': null,
    'id': String,
    'disabled': Boolean,
    'required': Boolean
  },

  /*
   * Initial state of the component's data.
   */
  data: function() {
    return {
      temp_value: 0,
      ratings: [1, 2, 3, 4, 5],
      rate: this.value,

    };
  },

  methods: {
    /*
     * Behaviour of the stars on mouseover.
     */
    star_over: function(index) {
      var self = this;

      if (!this.disabled) {
        this.temp_value = this.value;
        return this.rate = index;
      }

    },

    /*
     * Behaviour of the stars on mouseout.
     */
    star_out: function() {
      var self = this;

      if (!this.disabled) {
        return this.rate = this.temp_value;
      }
    },

    /*
     * Set the rating.
     */
    set: function(value) {
      var self = this;

      if (!this.disabled) {
        this.temp_value = value;
        return this.rate = value;
      }
    }
  }
}
</script>