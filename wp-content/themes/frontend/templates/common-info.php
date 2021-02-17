<?php $counter = 0; ?>
<div class="reviews-single__common-info">
<h4>Общая информация</h4>

<ul class="reviews-single__info-list">

    <?php if( get_field('owner') ): ?>  
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        🤵🏼 <p>Владелец:</p>
        </span>
        <span class="info-list-li__value">
        <p><?php the_field( "owner" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('official_site') ): ?>
    <?php $counter++; ?>  
    <li class="info-list-li">
        <span class="info-list-li__title">
        🌐 <p> Официальный сайт:</p>
        </span>
        <span class="info-list-li__value">
        <a href="<?php the_field( "official_site" ); ?>" target="_blank"><?php the_field( "official_site" ); ?></a>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('creation_year') ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        
        🗓 <p>Год создания:</p>
        </span>
        <span class="info-list-li__value">
        <p><?php the_field( "creation_year" ); ?></p>
        </span>
    </li>
    <? endif; ?> 


    <?php if( get_field('email') ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        📪 <p>E-mail:</p>
        </span>
        <span class="info-list-li__value">
        <p><?php the_field( "email" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('interface_language') ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        📚 <p> Язык интерфейса:</p>
        </span>
        <span class="info-list-li__value">
        <p><?php the_field( "interface_language" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('payment_systems') ): ?>
    <?php $counter++; ?> 
    <li class="info-list-li">
        <span class="info-list-li__title">
        💰 <p>  Платежные системы:</p>
        </span>
        <span class="info-list-li__value">
        <p><?php the_field( "payment_systems" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('minimum_deposit') ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        💳 <p>   Минимальный депозит:</p>
        </span> 
        <span class="info-list-li__value">
        <p><?php the_field( "minimum_deposit" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php if( get_field('minimum_withdrawal') ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        💳 <p>   Минимальный вывод:</p>
        </span> 
        <span class="info-list-li__value">
        <p><?php the_field( "minimum_withdrawal" ); ?></p>
        </span>
    </li>
    <? endif; ?> 

    <?php $mobile_version = get_field('mobile_version'); ?>
    
    <?php if(  isset($mobile_version)  ): ?> 
    <?php $counter++; ?>
    <li class="info-list-li">
        <span class="info-list-li__title">
        📱 <p>    Мобильная версия:</p>
        </span> 
        <span class="info-list-li__value">
        <p><?php echo $mobile_version === true ? "Есть" : "Отсутствует"; ?>  </p>
        </span>
    </li>
    <? endif; ?> 

    <?php $application = get_field('application'); ?>
    
    <?php if(  isset($application)  ): ?> 
    <?php $counter++; ?>    
    <li class="info-list-li">
        <span class="info-list-li__title">
        🕹 <p>   Приложение:</p>
        </span> 
        <span class="info-list-li__value">
        <p><?php echo $application === true ? "Есть" : "Отсутствует"; ?>  </p>
        </span>
    </li>
    <? endif; ?>
    
    <?php if($counter == 0): ?>
        <br /> Отсутствует
    <?php endif; ?>

    
</ul>

</div>
    