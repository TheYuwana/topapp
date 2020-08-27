<template>
  <div>
    <HomeButton />
    <div class="fizzbuzz-container">
      <h2>FizzBuzz</h2>
      <ul>
        <li>
          <div class="fizzbuzz-container-legenda fizzbuzz-container-legenda-fizz"></div>fizz
        </li>
        <li>
          <div class="fizzbuzz-container-legenda fizzbuzz-container-legenda-buzz"></div>buzz
        </li>
        <li>
          <div class="fizzbuzz-container-legenda fizzbuzz-container-legenda-fizzbuzz"></div>fizzbuzz
        </li>
      </ul>
      <div v-for="(fb, index) in fizzBuzzArr" :key="index" :class="boxClasses(fb.class)">
        <p>{{ fb.val }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import RequestHandler from "../RequestHandler";
import HomeButton from "../utils/HomeButton";
export default {
  name: "FizzBuzz",
  components: {
    HomeButton,
  },
  mounted() {
    RequestHandler.fizzbuzz()
      .then((response) => {
        this.fizzBuzzArr = response.data.fizzbuzz;
      })
      .catch((error) => {
        // Nothing to handle
      });
  },
  data() {
    return {
      fizzBuzzArr: [],
    };
  },
  methods: {
    boxClasses(boxClass) {
      return {
        "fizzbuzz-container-box": true,
        "fizzbuzz-container-box-fizz": boxClass === "fizz",
        "fizzbuzz-container-box-buzz": boxClass === "buzz",
        "fizzbuzz-container-box-fizzbuzz": boxClass === "fizzbuzz",
      };
    },
  },
};
</script>

<style lang="scss">
.fizzbuzz-container {
  width: 100%;
  height: 100vh;
  text-align: center;
  position: relative;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;

  h2 {
    width: 100%;
    margin-top: 25px;
    margin-bottom: 25px;
    color: black;
  }

  ul {
    list-style-type: none;
    width: 100%;
    margin: 0px 0px 25px 0px;
    li {
      position: relative;
      display: inline-block;
      width: 60px;
      text-align: left;

      .fizzbuzz-container-legenda {
        position: absolute;
        left: -20px;
      }
    }
  }

  &-legenda {
    width: 15px;
    height: 15px;
    background-color: aliceblue;
    &-fizz {
      background-color: #5897a6;
    }
    &-buzz {
      background-color: #f2cb05;
    }
    &-fizzbuzz {
      background-color: #f27405;
    }
  }

  &-box {
    width: 50px;
    height: 50px;
    background-color: white;
    margin: 5px;
    p {
      margin-top: 16px;
    }

    &-fizz {
      background-color: #5897a6;
    }
    &-buzz {
      background-color: #f2cb05;
    }
    &-fizzbuzz {
      background-color: #f27405;
    }
  }
}
</style>