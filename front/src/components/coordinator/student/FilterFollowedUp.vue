<template>
  <section>
    <div class="text-card">
      <h1>Student Followed-Up</h1>
    </div>
    <div class="followed">
      <div class="flex">
        <button
          id="dropdown-button"
          data-dropdown-toggle="dropdown"
          class="
            flex-shrink-0
            z-10
            inline-flex
            items-center
            py-3
            px-4
            text-2sm
            font-medium
            text-center text-gray-900
            bg-gray-100
            border border-gray-300
            rounded-l-lg
            hover:bg-gray-200
            focus:ring-4 focus:outline-none focus:ring-gray-100
            dark:bg-gray-700
            dark:hover:bg-gray-600
            dark:focus:ring-gray-700
            dark:text-white
            dark:border-gray-600
          "
          type="button"
        >
          Filter By Batch
        </button>
        <div
          id="dropdown"
          class="
            hidden
            z-10
            w-44
            bg-white
            rounded
            divide-y divide-gray-100
            shadow
            dark:bg-gray-700
          "
          data-popper-reference-hidden=""
          data-popper-escaped=""
          data-popper-placement="top"
          style="
            position: absolute;
            inset: auto auto 0px 0px;
            margin: 0px;
            transform: translate3d(897px, 5637px, 0px);
          "
        ></div>
        <div class="w-full">
          <select
            id="countries"
            class="
              py-3
              block
              w-full
              z-20
              text-lg text-gray-900
              bg-gray-50
              rounded-r-lg
              border-l-gray-50 border-l-2 border border-gray-300
              focus:ring-blue-500 focus:border-blue-500
              dark:bg-gray-700
              dark:border-l-gray-700
              dark:border-gray-600
              dark:placeholder-gray-400
              dark:text-white
              dark:focus:border-blue-500
            "
          >
            <option selected>Batch</option>
            <option value="A">2022 WEB-A</option>
            <option value="B">2022 WEB-B</option>
            <option value="S">2022 SNA</option>
            <option value="A1">2023 WEB-A</option>
            <option value="B1">2023 WEB-B</option>
            <option value="S1">2023 SNA</option>
          </select>
        </div>
      </div>

      <div class="flex">
        <button
          id="dropdown-button"
          data-dropdown-toggle="dropdown"
          class="
            flex-shrink-0
            z-10
            inline-flex
            items-center
            py-3
            px-4
            text-2sm
            font-medium
            text-center text-gray-900
            bg-gray-100
            border border-gray-300
            rounded-l-lg
            hover:bg-gray-200
            focus:ring-4 focus:outline-none focus:ring-gray-100
            dark:bg-gray-700
            dark:hover:bg-gray-600
            dark:focus:ring-gray-700
            dark:text-white
            dark:border-gray-600
          "
          type="button"
        >
          Filter By Name
        </button>
        <div
          id="dropdown"
          class="
            hidden
            z-10
            w-44
            bg-white
            rounded
            divide-y divide-gray-100
            shadow
            dark:bg-gray-700
          "
          data-popper-reference-hidden=""
          data-popper-escaped=""
          data-popper-placement="top"
          style="
            position: absolute;
            inset: auto auto 0px 0px;
            margin: 0px;
            transform: translate3d(897px, 5637px, 0px);
          "
        ></div>
        <div class="w-full">
          <div class="relative w-full">
            <input
              type="search"
              id="search-dropdown"
              class="
                py-3
                block
                p-2.5
                w-full
                z-20
                text-lg text-gray-900
                bg-gray-50
                rounded-r-lg
                border-l-gray-50 border-l-2 border border-gray-300
                focus:ring-blue-500 focus:border-blue-500
                dark:bg-gray-700
                dark:border-l-gray-700
                dark:border-gray-600
                dark:placeholder-gray-400
                dark:text-white
                dark:focus:border-blue-500
              "
              placeholder="Search"
              required
            />
          </div>
        </div>
      </div>

      <div class="flex">
        <button
          id="dropdown-button"
          data-dropdown-toggle="dropdown"
          class="
            flex-shrink-0
            z-10
            inline-flex
            items-center
            py-3
            px-4
            text-2sm
            font-medium
            text-center text-gray-900
            bg-sky-100
            border border-gray-300
            rounded-l-lg
            hover:bg-gray-200
            focus:ring-4 focus:outline-none focus:ring-gray-100
            dark:bg-sky-700
            dark:hover:bg-sky-600
            dark:focus:ring-gray-700
            dark:text-white
            dark:border-gray-600
          "
          type="button"
        >
          Filter By Totor
        </button>
        <div
          id="dropdown"
          class="
            hidden
            z-10
            w-44
            bg-white
            rounded
            divide-y divide-gray-100
            shadow
            dark:bg-gray-700
          "
          data-popper-reference-hidden=""
          data-popper-escaped=""
          data-popper-placement="top"
          style="
            position: absolute;
            inset: auto auto 0px 0px;
            margin: 0px;
            transform: translate3d(897px, 5637px, 0px);
          "
        ></div>
        <div class="w-full">
          <div class="relative w-full">
            <input
              type="search"
              id="search-dropdown"
              class="
                py-3
                block
                p-2.5
                w-full
                z-20
                text-lg text-gray-900
                bg-gray-50
                rounded-r-lg
                border-l-gray-50 border-l-2 border border-gray-300
                focus:ring-blue-500 focus:border-blue-500
                dark:bg-gray-700
                dark:border-l-gray-700
                dark:border-gray-600
                dark:placeholder-gray-400
                dark:text-white
                dark:focus:border-blue-500
              "
              placeholder="Search"
              required
            />
          </div>
        </div>
      </div>
    </div>
    <div class="box-number">
      <svg
        class="h-20 w-20 text-black"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M15 19l-7-7 7-7"
        />
      </svg>
      <div class="numer1">1</div>
      <div class="numer2">2</div>
      <div class="numer3">3</div>
      <div class="numer4">4</div>
      <div class="text-end"></div>
      <svg
        class="h-20 w-20 text-black"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5l7 7-7 7"
        />
      </svg>
    </div>
  </section>
</template>

<script>
export default {

};
</script>

<style scoped>
.followed {
  display: flex;
  margin: auto;
  justify-content: center;
  align-items: center;
}
.flex {
  width: 430px;
  display: flex;
  justify-content: space-between;
  margin: 15px 15px;
}
.text-card {
  display: flex;
  font-size: 50px;
  margin-bottom: 50px;
  margin-left: 270px;
  margin-top: 20px;
  justify-content: flex-start;
  font-weight: bold;
  font-family: sans-serif;
}
#dropdown-button {
  background: #22bbea;
}
.box-number {
  display: flex;
  width: 400px;
  margin: 15px auto 15px;
  justify-content: center;
  align-items: center;
  margin-left: 270px;
}
.numer1,
.numer2,
.numer3,
.numer4 {
  width: 60px;
  margin: 8px 8px;
  background: #22bbea;
  padding: 8px 8px;
  text-align: center;
  justify-content: center;
  border-radius: 5px;
  font-weight: bold;
  color: white;
  font-size: 18px;
}
</style>