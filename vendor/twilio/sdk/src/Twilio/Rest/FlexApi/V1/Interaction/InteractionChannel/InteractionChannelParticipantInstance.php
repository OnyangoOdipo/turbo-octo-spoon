<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\FlexApi\V1\Interaction\InteractionChannel;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;


/**
 * @property string|null $sid
 * @property string $type
 * @property string|null $interactionSid
 * @property string|null $channelSid
 * @property string|null $url
 * @property array|null $routingProperties
 */
class InteractionChannelParticipantInstance extends InstanceResource
{
    /**
     * Initialize the InteractionChannelParticipantInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $interactionSid The Interaction Sid for the new Channel Participant.
     * @param string $channelSid The Channel Sid for the new Channel Participant.
     * @param string $sid The unique string created by Twilio to identify an Interaction Channel resource.
     */
    public function __construct(Version $version, array $payload, string $interactionSid, string $channelSid, string $sid = null)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'type' => Values::array_get($payload, 'type'),
            'interactionSid' => Values::array_get($payload, 'interaction_sid'),
            'channelSid' => Values::array_get($payload, 'channel_sid'),
            'url' => Values::array_get($payload, 'url'),
            'routingProperties' => Values::array_get($payload, 'routing_properties'),
        ];

        $this->solution = ['interactionSid' => $interactionSid, 'channelSid' => $channelSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return InteractionChannelParticipantContext Context for this InteractionChannelParticipantInstance
     */
    protected function proxy(): InteractionChannelParticipantContext
    {
        if (!$this->context) {
            $this->context = new InteractionChannelParticipantContext(
                $this->version,
                $this->solution['interactionSid'],
                $this->solution['channelSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Update the InteractionChannelParticipantInstance
     *
     * @param string $status
     * @return InteractionChannelParticipantInstance Updated InteractionChannelParticipantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status): InteractionChannelParticipantInstance
    {

        return $this->proxy()->update($status);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.FlexApi.V1.InteractionChannelParticipantInstance ' . \implode(' ', $context) . ']';
    }
}

