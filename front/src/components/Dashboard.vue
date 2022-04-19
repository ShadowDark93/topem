<template>
  <div>
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <SideBar/>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
            <NavBar/>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <router-view />
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footerView/>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <LogoutModal/>
  </div>
</template>

<script>
import footerView from '@/views/Footer.vue'
import NavBar from '@/views/NavbarView.vue'
import SideBar from '@/views/SidebarView.vue'
import LogoutModal from '@/views/LogoutModal.vue'

export default {
  name: "DashboardComponent",
  components:{
    footerView,
    NavBar,
    SideBar,
    LogoutModal,
  },
  data() {
    return {
    };
  },

  mounted() {
  },

  methods: {
    
  },
};
</script>
