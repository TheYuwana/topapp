<template>
  <div>
    <HomeButton />
    <div class="rotating-array">
      <h2>Rotating Array</h2>

      <button class="topapp-button" v-on:click="rotateArray('left')">Rotate left</button>
      <button class="topapp-button" v-on:click="rotateArray('right')">Rotate right</button>

      <div class="array-container">
        <div v-for="(arrRow, arrRowIndex) in rotatingArray" :key="arrRowIndex" class="array-rows">
          <div
            v-for="(arrCol, arrColIndex) in arrRow"
            :key="arrColIndex"
            :class="blockClasses(arrCol)"
          >
            <p>{{ arrCol }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeButton from "../utils/HomeButton";
export default {
  name: "RotatingArray",
  components: {
    HomeButton,
  },
  data() {
    return {
      highlighted: [1, 2, 3],
      rotatingArray: [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
      ],
    };
  },
  methods: {
    rotateArray(direction) {
      let newArr = [];
      if (direction === "right") {
        for (let i = 0; i < this.rotatingArray.length; i++) {
          let newRow = [];
          let a = 0;
          for (let b = this.rotatingArray.length - 1; b >= 0; b--) {
            newRow[a] = this.rotatingArray[b][i];
            a++;
          }
          newArr.push(newRow);
        }
      } else {
        for (let i = this.rotatingArray.length - 1; i >= 0; i--) {
          let newRow = [];
          let a = 0;
          for (let b = 0; b < this.rotatingArray.length; b++) {
            newRow[a] = this.rotatingArray[b][i];
            a++;
          }
          newArr.push(newRow);
        }
      }
      this.rotatingArray = newArr;
    },
    blockClasses(blockNr) {
      return {
        "array-columns": true,
        "array-columns-default": !this.highlighted.includes(blockNr),
        "array-columns-highlighted": this.highlighted.includes(blockNr),
      };
    },
  },
};
</script>

<style lang="scss">
.rotating-array {
  width: 100%;
  height: 100vh;
  text-align: center;
  position: relative;
  justify-content: center;

  h2 {
    width: 100%;
    margin-top: 25px;
    margin-bottom: 25px;
    color: black;
  }
}

.array-container {
  width: 300px;
  margin: 25px auto;
  .array-rows {
    width: 100%;
    display: flex;

    .array-columns {
      width: 100%;
      height: 50px;
      text-align: center;
      margin: 5px;

      p {
        margin-top: 17px;
      }

      &-default {
        background-color: white;
      }

      &-highlighted {
        background-color: #5897a6;
        color: white;
      }
    }
  }
}
</style>