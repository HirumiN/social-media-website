<template>
    <div class="overflow-auto">
        <PostItem :post="post1"/>
        <PostItem :post="post2"/>
    </div>
</template>

<script setup>
import PostItem from './PostItem.vue';

const post1 = {
    user : {
        id : 1,
        avatar : 'https://randomuser.me/api/portraits/men/28.jpg',
        name : 'John Doe'
    },
    group : null,
    attachments : [
        {
            id : 1,
            name : 'test.png',
            mime : 'image/png',
            url : 'https://picsum.photos/1000'
        },
        {
            id : 2,
            name : 'test2.png',
            mime : 'image/png',
            url : 'https://picsum.photos/1000'
        },
        {
            id : 3,
            name : 'Documentation.docx',
            mime : 'application/msword',
            url : '#'
        },
    ],
    body : `<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur beatae aspernatur vitae laudantium facere exercitationem accusantium officia necessitatibus animi culpa quo ipsa, magnam dolores fuga ex voluptas nostrum repellat. Dolorem!</p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur beatae aspernatur vitae laudantium facere exercitationem accusantium officia necessitatibus animi culpa quo ipsa, magnam dolores fuga ex voluptas nostrum repellat. Dolorem!</p>`,
    created_at : '2022-01-01 12:00',
}

const post2 = {
    user : {
        id : 1,
        avatar : 'https://randomuser.me/api/portraits/men/25.jpg',
        name : 'Johnatan Doe'
    },
    group : {
        id : 1,
        name : 'Developer'
    },
    body : `<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur beatae aspernatur vitae laudantium facere exercitationem accusantium officia necessitatibus animi culpa quo ipsa, magnam dolores fuga ex voluptas nostrum repellat. Dolorem!</p>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur beatae aspernatur vitae laudantium facere exercitationem accusantium officia necessitatibus animi culpa quo ipsa, magnam dolores fuga ex voluptas nostrum repellat. Dolorem!</p>`,
    created_at : '2022-01-01 12:00',
}

</script>
