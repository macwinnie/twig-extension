Feature: Twig Function Extensions
  In order to use aditional functions
  As a developer of Twig templates
  I need to be able to use special Twig functions

  @env
  Scenario: Fetch an environmental variable into a template
    Given the environmental variable "LOREM" with value "ipsum"
    Given the template
        """
        Lorem {{ env( "LOREM" ) }} dolor sit amet
        """
    Then the template is rendered as
        """
        Lorem ipsum dolor sit amet
        """
