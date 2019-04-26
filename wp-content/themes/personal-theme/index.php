<?php get_header(); ?>

<main>
    <div class="head">
        <h1>AcadExchange</h1>
        <p class="goal">Our goal is to build <span>bridges</span> between academies</p>
        <img src="./img/imghead.png" alt="computer user" class="head__img">
    </div>
    <div class="interest">
        <h2>This site might be of interest to you</h2>
        <p>Are you a Cisco Networking Academy teaching CCNA ? <br> Are you struggling to get equipment to teach CCNA at your academy ?
            <br> Or are you having equipment that you do not use anymore at your academy ?</p>
    </div>

    <div class="introductions">
        <?php
        $introductions = new WP_Query([
            'post_type' => 'Home page introduction',
            'order' => 'ASC',
            'orderby' => 'date'
        ]);

        if ($introductions->have_posts()): while ($introductions->have_posts()) : $introductions->the_post();
            ?>

            <div class="introduction">
                <h2 class="introduction__h2"><?php the_title(); ?></h2>
                <p class="introduction__p"><?php the_field('Introduction'); ?></p>
                <img src="<?php the_field('Image'); ?>" alt="" class="introduction__img">
            </div>

        <?php endwhile; else: ?>
            <p class="empty"></p>
        <?php endif; ?>
    </div>

    <div class="actions">
        <h2 class="actions__h2"></h2>
        <ul class="actions__list">
            <li class="action">
                <a href="./donation.html" class="donation">
                    <img src="./img/donationicon.jpg" alt="Donation">
                    <p>Donation</p>
                </a>
            </li>
            <li class="action">
                <a href="./getequipment.html" class="getequipment">
                    <img src="./img/geticon.jpg" alt="Get equipment">
                    <p>Get equipment</p>
                </a>
            </li>
            <li class="action">
                <a href="./twinning.html" class="twinning">
                    <img src="./img/twinningicon.jpg" alt="Donation">
                    <p>Donation</p>
                </a>
            </li>
        </ul>
    </div>
</main>

<?php get_footer(); ?>