<td class="sf_admin_date sf_admin_list_td_initial_date">
  <?php echo link_to(false !== strtotime($counter->getInitialDate()) ? format_date($counter->getInitialDate(), "dd-MMMM-yyyy") : '&nbsp;', 'counter_edit', $counter) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_initial_number">
  <?php echo link_to($counter->getInitialNumber(), 'counter_edit', $counter) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_period">
  <?php echo link_to($counter->getPeriod(), 'counter_edit', $counter) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_objective_number">
  <?php echo link_to($counter->getObjectiveNumber(), 'counter_edit', $counter) ?>
</td>
