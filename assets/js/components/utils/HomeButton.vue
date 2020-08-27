<template>
  <div class="home-button">
    <button v-on:click="backHome()">Back home</button>
  </div>
</template>

<script>
import RequestHandler from "../RequestHandler";

export default {
  name: "HomeButton",
  methods: {
    backHome() {
      this.$router.push({ path: "/playground" });
    },
  },
};
</script>

<style lang="scss">
.home-button {
  position: absolute;
  top: 15px;
  left: 15px;

  button {
    appearance: none;
    border: 0px;
    padding: 15px;
    background-color: #f25ebf;
    color: white;
    border-radius: 50px;
    transition: background-color 0.3s;

    &:hover {
      cursor: pointer;
      background-color: #f2cb05;
    }
  }
}
</style>