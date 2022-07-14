<?php
/*
* Template Name: Add School
*/

get_header(); ?>

<body>
   <section class="main">
      <div class="main__container container">
         <form class="form">
            <p class="form__title">Провести школу</p>
            <div class="form__block">
               <?php
               global $wpdb;
               $mkkPowers = $wpdb->get_var("select mkk.Powers from mkk
               inner join kpk on mkk.id_mkk = kpk.id_mkk
               where id_kpk = '" . $userID . "'");
               $types = $wpdb->get_results("select * from type_of_utp");
               $level = $wpdb->get_var("select Powers from kpk where id_kpk = '" . $userID . "'");
               $members = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as fio, people.id_people
                from people");
               ?>
               <div class="form__row">
                  <label class="emailWithHint" for="email">Email <br><span class="underLabel">(Используется для авторизации)</span></label>
                  <input type="email" id="email">
               </div>
               <div class="form__row">
                  <label for="schoolName">Название</label>
                  <input id="schoolName" type="text" name="schoolName">
               </div>
               <div class="form__row">
                  <label for="school">Уровень школы</label>
                  <select name="schoolType" id="schoolType">
                     <option value="notChosen">-Не выбрано-</option>
                     <?php
                     switch ($level) {
                        case 4:
                     ?>
                           <option value="4">Высший уровень</option>
                        <?php
                        case 3:
                        ?>
                           <option value="3">Специализированный уровень</option>
                        <?php
                        case 2:
                        ?>
                           <option value="2">Базовый уровень</option>
                        <?php
                        case 1:
                        ?>
                           <option value="1">Начальный уровень</option>
                     <?php }
                     ?>
                  </select>
               </div>
               <div class="form__row">
                  <label for="typeTurism">Вид туризма</label>
                  <select name="typeTurism" id="typeTurism">
                     <option value="notChosen">-Выберите уровень школы-</option>
                  </select>
               </div>
               <div class="form__row">
                  <label for="dateFrom">Дата начала</label>
                  <input type="date" id="dateFrom">
               </div>
               <div class="form__row">
                  <label for="dateTo">Дата окончания</label>
                  <input type="date" id="dateTo">
               </div>
               <!-- <div class="form__row">
                  <label for="departCnt">Количество отделений</label>
                  <input type="number" id="departCnt">
               </div> -->
               <div class="form__row">
                  <label for="directorSchool">Начальник школы</label>
                  <select name="directorSchool" id="directorSchool">
                     <option value="notChosen">-Не выбрано-</option>
                     <?php
                     foreach ($members as $member) { ?>
                        <option value="<?php echo $member->id_people ?>"><?php echo $member->fio ?></option>
                     <?php
                     }
                     ?>
                  </select>
               </div>
               <div class="form__row directorEducationRow" hidden>
                  <label for="directorEducation">Начальник учебной части</label>
                  <select name="directorEducation" id="directorEducation">
                     <option value="notChosen">-Не выбрано-</option>
                     <?php
                     foreach ($members as $member) { ?>
                        <option value="<?php echo $member->id_people ?>"><?php echo $member->fio ?></option>
                     <?php
                     }
                     ?>
                  </select>
               </div>

               <div class="form__row form__row-ips">
                  <label for="ips">Инструктора и стажеры</label>
                  <div class="form_row-changeIPS">
                     <?php
                     $people = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO, people.* from people");
                     $result = $wpdb->get_results("select people.*, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO
                     from ips
                     inner join people on ips.ID_people = people.ID_people
                     where ID_ips in(
                     select max(id_ips)
                     from ips
                     group by ips.id_people)
                     and ID_school ='" . $id_school . "' and delete_mark = 0");
                     ?>
                     <table <?php if ($result == null)
                                 echo 'hidden'; ?> class="table table-delete" id="info-table">
                        <thead>
                           <tr>
                              <th></th>
                              <th onclick="sortTable(1)" value="Last_name" class="th">ФИО</th>
                              <th onclick="sortTable(2)" value="Date_of_birth" class="th">Дата рождения</th>
                              <th onclick="sortTable(3)" value="internship" class="th">Стажер</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           foreach ($result as $man) { ?>
                              <tr>
                                 <!-- <td>
                                    <button value="<?php echo $man->ID_people; ?>" class="deleteBtn tableBtn">
                                       <svg version="1.1" class="deleteImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                          <g>
                                             <path d="M17.586,46.414C17.977,46.805,18.488,47,19,47s1.023-0.195,1.414-0.586L32,34.828l11.586,11.586
		C43.977,46.805,44.488,47,45,47s1.023-0.195,1.414-0.586c0.781-0.781,0.781-2.047,0-2.828L34.828,32l11.586-11.586
		c0.781-0.781,0.781-2.047,0-2.828c-0.781-0.781-2.047-0.781-2.828,0L32,29.172L20.414,17.586c-0.781-0.781-2.047-0.781-2.828,0
		c-0.781,0.781-0.781,2.047,0,2.828L29.172,32L17.586,43.586C16.805,44.367,16.805,45.633,17.586,46.414z" />
                                             <path d="M32,64c8.547,0,16.583-3.329,22.626-9.373C60.671,48.583,64,40.547,64,32s-3.329-16.583-9.374-22.626
		C48.583,3.329,40.547,0,32,0S15.417,3.329,9.374,9.373C3.329,15.417,0,23.453,0,32s3.329,16.583,9.374,22.626
		C15.417,60.671,23.453,64,32,64z M12.202,12.202C17.49,6.913,24.521,4,32,4s14.51,2.913,19.798,8.202C57.087,17.49,60,24.521,60,32
		s-2.913,14.51-8.202,19.798C46.51,57.087,39.479,60,32,60s-14.51-2.913-19.798-8.202C6.913,46.51,4,39.479,4,32
		S6.913,17.49,12.202,12.202z" />
                                          </g>
                                       </svg>
                                    </button>

                                 </td>
                                 <td><?php echo $man->FIO; ?></td>
                                 <td><?php echo $man->Date_of_birth; ?></td> -->
                              </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                     <select hidden class="addMember" name="people" id="people">
                        <option value="notChosen">-Выберите человека-</option>
                        <?php
                        foreach ($people as $man) { ?>
                           <option data-dateOfBirth='<?php echo $man->Date_of_birth ?>' value="<?php echo $man->ID_people ?>"><?php echo $man->FIO ?></option>
                        <?php
                        }
                        ?>
                     </select>
                     <button hidden class="deleteBtn tableBtn deleteBtnSrc">
                        <svg version="1.1" class="deleteImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                           <g>
                              <path d="M17.586,46.414C17.977,46.805,18.488,47,19,47s1.023-0.195,1.414-0.586L32,34.828l11.586,11.586
		C43.977,46.805,44.488,47,45,47s1.023-0.195,1.414-0.586c0.781-0.781,0.781-2.047,0-2.828L34.828,32l11.586-11.586
		c0.781-0.781,0.781-2.047,0-2.828c-0.781-0.781-2.047-0.781-2.828,0L32,29.172L20.414,17.586c-0.781-0.781-2.047-0.781-2.828,0
		c-0.781,0.781-0.781,2.047,0,2.828L29.172,32L17.586,43.586C16.805,44.367,16.805,45.633,17.586,46.414z" />
                              <path d="M32,64c8.547,0,16.583-3.329,22.626-9.373C60.671,48.583,64,40.547,64,32s-3.329-16.583-9.374-22.626
		C48.583,3.329,40.547,0,32,0S15.417,3.329,9.374,9.373C3.329,15.417,0,23.453,0,32s3.329,16.583,9.374,22.626
		C15.417,60.671,23.453,64,32,64z M12.202,12.202C17.49,6.913,24.521,4,32,4s14.51,2.913,19.798,8.202C57.087,17.49,60,24.521,60,32
		s-2.913,14.51-8.202,19.798C46.51,57.087,39.479,60,32,60s-14.51-2.913-19.798-8.202C6.913,46.51,4,39.479,4,32
		S6.913,17.49,12.202,12.202z" />
                           </g>
                        </svg>
                     </button>
                     <button class="btn btnAdd">Добавить</button>
                  </div>
               </div>

               <select hidden id="typeTurismSource">
                  <?php foreach ($types as $type) { ?>
                     <option value="<?php echo $type->ID_types_of_utp ?>"><?php echo $type->Name ?></option>
                  <?php } ?>
               </select>

               <p hidden id="mkkPowers"><?php echo $mkkPowers; ?></p>
               
               <button class="form__resetbtn btn" type="reset">Сброс</button>
               <button class="form__submit btn">Добавить</button>
               <p class="no-rows" hidden>Студентов нет</p>
               <p class="userRole" hidden><?php echo $userRole; ?></p>
            </div>

         </form>
      </div>
   </section>

</body>


<?php get_footer(); ?>


</html>