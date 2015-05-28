<?php
    // if there are any results, go and extract all the links from the parent site
    foreach ($subpages as $hrefLinks) { ?>
        <tr>
            <td> <?= $hrefLinks['ref_link'] ?> </td>
            <td class='center'>
                <form action='/update_crawler' method='post'>
            <?php 
                echo "<input class='checkbox' type='checkbox' name='link_id'";
                   	if ($hrefLinks['scrape']=='Y') {echo 'checked>';}
					else {echo ">";}
                echo "<input type='hidden' name='main_site_id' value='".$hrefLinks['main_site_id']."'>";
                echo "<input type='hidden' name='ref_link' value='".$hrefLinks['ref_link']."'>";
                echo "<input type='hidden' name='link_id' value='".$hrefLinks['link_id']."'>";
                echo '</td></form>';
        echo "</tr>";
    }
?>