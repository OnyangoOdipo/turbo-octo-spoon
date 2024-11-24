<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Trusthub
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Trusthub\V1;

use Twilio\Options;
use Twilio\Values;

abstract class ComplianceInquiriesOptions
{
    /**
     * @param string $notificationEmail The email address that approval status updates will be sent to. If not specified, the email address associated with your primary customer profile will be used.
     * @return CreateComplianceInquiriesOptions Options builder
     */
    public static function create(
        
        string $notificationEmail = Values::NONE

    ): CreateComplianceInquiriesOptions
    {
        return new CreateComplianceInquiriesOptions(
            $notificationEmail
        );
    }


}

class CreateComplianceInquiriesOptions extends Options
    {
    /**
     * @param string $notificationEmail The email address that approval status updates will be sent to. If not specified, the email address associated with your primary customer profile will be used.
     */
    public function __construct(
        
        string $notificationEmail = Values::NONE

    ) {
        $this->options['notificationEmail'] = $notificationEmail;
    }

    /**
     * The email address that approval status updates will be sent to. If not specified, the email address associated with your primary customer profile will be used.
     *
     * @param string $notificationEmail The email address that approval status updates will be sent to. If not specified, the email address associated with your primary customer profile will be used.
     * @return $this Fluent Builder
     */
    public function setNotificationEmail(string $notificationEmail): self
    {
        $this->options['notificationEmail'] = $notificationEmail;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Trusthub.V1.CreateComplianceInquiriesOptions ' . $options . ']';
    }
}


