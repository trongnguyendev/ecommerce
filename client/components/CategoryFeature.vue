<template>
    <div class="container bg-bg-container">
        <div class="bg-bg p-5 rounded-sm overflow-hidden">
            <HeadingTitle name="Danh Mục Nổi Bật" class="mb-5" />
            <div class="grid grid-cols-auto-fit h-67 overflow-hidden gap-5 px-3">
                <NuxtLink to="/" v-for="item in category" :key="item.name" class="rounded-md hover:bg-bg-container">
                    <img :src="require('/assets/images/' + item.picture)" class="w-16 h-16 rounded-lg m-auto mb-4" alt="">
                    <h2 class="text-s-13 text-color-t text-center px-2">{{ item.name }}</h2>
                </NuxtLink>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: [
                { name: 'Thoi Trang Nam', picture: 'category_img6.png' },
                { name: 'Dien Thoai & Phu Kien', picture: 'category_img7.png' },
                { name: 'Thiet Bi Dien Tu', picture: 'category_img8.png' },
                { name: 'May Tinh & Laptop', picture: 'category_img9.png' },
                { name: 'May Anh & May Quay Phim', picture: 'category_img10.png' },
                { name: 'Dong Ho', picture: 'category_img11.png' },
                { name: 'Giay Dep Nam', picture: 'category_img12.png' },
                { name: 'The Thao & Du Lich', picture: 'category_img13.png' },
                { name: 'Thoi Gian Nu', picture: 'category_img14.png' },
                { name: 'Suc Khoe', picture: 'category_img15.png' },
                { name: 'Sac Dep', picture: 'category_img16.png' },
                { name: 'Xe Co', picture: 'category_img7.png' },
                { name: 'Nha Sach Online', picture: 'category_img17.png' },
                { name: 'Tui Vi Nu', picture: 'category_img18.png' },
                { name: 'Bach Hoa Online', picture: 'category_img19.png' },
                { name: 'Khau Trang Y Te', picture: 'category_img20.png' },
                { name: 'Xe Tay Ga', picture: 'category_img11.png' },
                { name: 'Ban Lam Viec', picture: 'category_img6.png' },
                { name: 'Thiet Bi Y Te', picture: 'category_img10.png' },
                { name: 'Tieu Thuyet', picture: 'category_img16.png' }
            ]
        }
    }
}
</script>