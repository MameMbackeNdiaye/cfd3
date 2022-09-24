<script>

export default({
  setup() {
    
  },
  data(){
    return {
      currentDate: new Date,
    }
  },
   template: '#app',
})
</script>

<template>   
      <footer class="footer pt-6 m-0 p-0 ">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 ml-60 mb-4 ">
              <ul class="nav nav-footer justify-content-center justify-content-lg">
                <li class="nav-item">
                  <a href="" class="nav-link text-muted" target="_blank">@Copyright</a>
                  <p class="ml-4">{{ currentDate.getFullYear()}}</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
</template>

