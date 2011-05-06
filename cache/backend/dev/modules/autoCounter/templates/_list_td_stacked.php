<td colspan="4">
  <?php echo __('%%initial_date%% - %%initial_number%% - %%period%% - %%objective_number%%', array('%%initial_date%%' => link_to(false !== strtotime($counter->getInitialDate()) ? format_date($counter->getInitialDate(), "dd-MMMM-yyyy") : '&nbsp;', 'counter_edit', $counter), '%%initial_number%%' => link_to($counter->getInitialNumber(), 'counter_edit', $counter), '%%period%%' => link_to($counter->getPeriod(), 'counter_edit', $counter), '%%objective_number%%' => link_to($counter->getObjectiveNumber(), 'counter_edit', $counter)), 'messages') ?>
</td>
